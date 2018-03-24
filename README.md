# Twitter Manager
Twitter Manager is used to get Details of a particular User on Twitter
The user can do different tasks like :
  - Sentiments Analysis
  - Favourites Count
  - Retweets Count
 
## Sentiment Analysis API
Developed using Node.js and Express.js<br>
Its is using AFINN List
Score = sum of each token / number of tokens
 
#### Installation
  - Install nodejs<br>
  `$curl -sL https://deb.nodesource.com/setup_9.x | sudo -E bash -`<br>
  `$sudo apt-get install -y nodejs`<br>
  - open /analysis
   `$cd analysis`
  - Install Dependencies<br>
    `$npm install`
  - Start server.js<br>
  `$node server.js`<br>
The Server will start on Port 8000

#### JSON Format for API to Analyzer<br>
`{
		"strings": ["this is not good", "this is good"]
}`<br>

Make the Post Request on URL : 8000
