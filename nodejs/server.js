const http = require('http');

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    
    let mysql = require('mysql');
    let config = require('./config.js');

    let connection = mysql.createConnection(config);

    let sql = "SELECT id,nombre,fdn FROM users";
    connection.query(sql, function (err, results, fields) {
        if (err) throw err;
        
        const users = results.map( result => ( {id: result.id, username: result.nombre} ) );
        
        res.setHeader('Content-Type', 'application/json');
        //console.log(users);
        res.end(JSON.stringify(users));
    });


});

server.listen(3000, '127.0.0.1', () => {
    console.log('Server running at http://localhost:3000/');    
});


