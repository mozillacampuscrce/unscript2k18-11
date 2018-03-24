const express = require('express')
const app = express()
const sent = require('sentiment')
const parser = require('body-parser')
-
app.use(parser.json())

app.use((req, res, next) => {
    console.log("Request from Remote")
    next()
})

app.post('/batch', (req, res, next) => {
    JSON.stringify(req.body).replace(/null/i, "\"\"")
    var strings = req.body.strings
    var p = 0 , ng = 0 , nt = 0;
    for(var i = 0 ; i < strings.length ; i++) {
        let score = sent(strings[i])
        score = score['score']
        if(score > 0) p++
        else if(score < 0) ng++
        else nt++
    }
    res.send({
        "positive" : p,
        "neutral" : nt,
        "negative" : ng,
        "total": strings.length
    })
})

app.post('/single', (req, res, next) => {
    JSON.stringify(req.body).replace(/null/i, "\"\"")
    let score = sent(req.body.string)
    score = score['score']
    if(score > 0) {
        res.send({
            "sentiment": "positive"
        })
    } else if(score < 0) {
        res.send({
            "sentiment": "negative"
        })
    } else {
        res.send({
            "sentiment": "neutral"
        })
    }
})

app.use((req, res, next) => {
    res.send(404)
})

const server = app.listen(8000, (error) => {
    if(error) throw error
    console.log('Server Started on Port 8000')
})
