import { Component, OnInit } from '@angular/core';
import { Usuario } from 'src/app/objetos/usuario';
@Component({
  selector: 'app-view-login-user',
  templateUrl: './view-login-user.component.html',
  styleUrls: ['./view-login-user.component.css']
})

export class ViewLoginUserComponent implements OnInit {

usuario:any;

  constructor() { 
    
  }

  ngOnInit(): void {
  }

}
