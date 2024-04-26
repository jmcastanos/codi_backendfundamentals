const express = require('express');

const app = express();

app.get('/', (req, res) => { 
    res.send("Hola desde express");
});


app.get('/users', (req, res) => {
    let mysql = require('mysql');
    let config = require('./config.js');

    let connection = mysql.createConnection(config);

    let sql = "SELECT id,nombre,fdn FROM users";
    connection.query(sql, function (err, results, fields) {
        if (err) throw err;

        //const users = results.map( result => ( {id: result.id, username: result.nombre} ) );

        res.setHeader('Content-Type', 'text/html'); //mime type
        //console.log(users);
        //res.end(JSON.stringify(results));
        res.write('<html><head><title>Users</title></head><body>');
        res.write('<h1>Users</h1>');
        res.write('<ul>');
        results.forEach( user => {
            res.write('<li>' + user.nombre + '</li>');
        });
        res.write('</ul>');
        res.write('</body></html>');
        res.end();
    });
    connection.end();
});

app.listen(3000, function(){
    console.log('Server running at http://localhost:3000/');
});