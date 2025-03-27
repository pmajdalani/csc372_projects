// expressServer.js
// Express server for serving static client site

const express = require('express');
const path = require('path');

const app = express();
const PORT = 1337;


const publicPath = __dirname;


app.use('/css', express.static(path.join(publicPath, 'css')));
app.use('/js', express.static(path.join(publicPath, 'js')));
app.use('/images', express.static(path.join(publicPath, 'images')));


app.get('/', (req, res) => {
  res.sendFile(path.join(publicPath, 'index.php'));
});


app.get('/accessories', (req, res) => {
  res.sendFile(path.join(publicPath, 'accessories.php'));
});


app.get('/clothing', (req, res) => {
  res.sendFile(path.join(publicPath, 'clothing.php'));
});


app.get('/stickers', (req, res) => {
  res.sendFile(path.join(publicPath, 'stickers.php'));
});


app.get('*', (req, res) => {
  res.status(404).sendFile(path.join(publicPath, '404.html'));
});


app.listen(PORT, () => {
  console.log(`Server is running at http://localhost:${PORT}`);
});
