import { Component, OnInit } from '@angular/core';
import { Usuario } from 'src/app/objetos/usuario';
import { createBrotliDecompress } from 'zlib';
@Component({
  selector: 'app-view-login-user',
  templateUrl: './view-login-user.component.html',
  styleUrls: ['./view-login-user.component.css']
})
export class ViewLoginUserComponent implements OnInit {

usuario:any;

  constructor() { 
    
    this.createbd();

  

  }

  ngOnInit(): void {
  }

createbd(){
  var mysql = require('mysql');
  var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: ""
  });
  
  con.connect(function(err: any) {
    if (err) throw err;
    console.log("Connected!");
    con.query("CREATE DATABASE if not exist charcuteriaTocinoss", function (err: any, result: any) {
      if (err) throw err;
      console.log("Database created");
    });
  });
}

createtables(){
  var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "charcuteriaTocinoss"
});

con.connect(function(err: any) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "CREATE TABLE customers (name VARCHAR(255), address VARCHAR(255))";
  con.query(sql, function (err: any, result: any) {
    if (err) throw err;
    console.log("Table created");
  });
});
}

}
