import { Component, OnInit } from '@angular/core';
import {Provider} from '../../../providers/provider';
import {Router} from '@angular/router';
import {Storage} from '@ionic/storage';


@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage {

  LoginPengguna:string;
  KataLaluan:string;
  task:any[];

  constructor(
    private provider:Provider,
    private  router:Router,
    private storage: Storage
  ) { }

  login(){
    return new Promise(resolve =>{
      let body = {
        LoginPengguna:this.LoginPengguna,
        KataLaluan:this.KataLaluan
      };

      this.provider.postData(body, 'login.php').subscribe(data => {
       // console.log(data);

       if(data['user']){
        this.storage.set('IdPengguna', data['user'][0]['IdPengguna']);
        this.router.navigate(['menu/first/tabs/tab1']);
        }else {
          alert("Login failed");
        }
      });
    })
  }

}
