const express = require('express')
const app = express()
const sent = require('sentiment')
const parser = require('body-parser')

app.use(parser.json())

app.post('/', (req, res, next) => {
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

const server = app.listen(8000, (error) => {
    if(error) throw error
})