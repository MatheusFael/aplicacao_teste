const express = require('express');
const mysql = require('mysql');

const app = express();

const connection = mysql.createConnection({
    host: 'mysql-container', 
    user: 'root',
    password: 'programadorabordo',
    database: 'programadorabordo'
});


connection.connect((err) => {
    if (err) {
        console.error('Erro ao conectar ao MySQL:', err.stack);
        return;
    }
    console.log('Conectado ao MySQL como ID ' + connection.threadId);
});


app.get('/products', function(req, res) {
    connection.query('SELECT * FROM products', function(error, results) {
        if (error) {
            return res.status(500).send(error);
        }
        res.send(results.map(item => ({ name: item.name, price: item.price })));
    });
});


app.listen(9001, '0.0.0.0', function() {
    console.log('Listening on port 9001');
});
