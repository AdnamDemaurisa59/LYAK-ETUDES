
const express = require('express');
const fetch = require('node-fetch');
const app = express();
const PORT = process.env.PORT || 3000;

app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
    next();
});

app.get('/api/jobs', async (req, res) => {
    try {
        const response = await fetch('https://www.welcometothejungle.com/api/v1/jobs');
        const data = await response.json();
        res.json(data);
    } catch (error) {
        console.error('Error fetching API:', error);
        res.status(500).send('Error fetching API');
    }
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});