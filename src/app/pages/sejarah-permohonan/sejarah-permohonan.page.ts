import { Component, OnInit } from '@angular/core';
import {Storage} from '@ionic/storage';
import {Router} from '@angular/router';
import {Provider} from '../../../providers/provider';

@Component({
  selector: 'app-sejarah-permohonan',
  templateUrl: './sejarah-permohonan.page.html',
  styleUrls: ['./sejarah-permohonan.page.scss'],
})
export class SejarahPermohonanPage implements OnInit {

  IdPengguna:string;
  maklumat:any = []

  constructor(
    private storage: Storage,
    private router:Router,
    private provider: Provider
  ) { }

  ngOnInit() {
    this.storage.get('IdPengguna').then((IdPengguna) => {
      this.IdPengguna = IdPengguna;
      console.log(this.IdPengguna);

      this.loadTask();

    });
  }

  loadTask(){
    return new Promise(resolve => {
      
      let body = {
        IdPengguna:this.IdPengguna
      };

      this.provider.postData(body, 'papar_sejarahmohon.php').subscribe(
        datas=> {
        for(let data of datas['pr_master_pengguna']){
          this.maklumat.push(data);
        }
        resolve(true);
      }
      )
    })
  }

  goHome(){
    this.router.navigate(['menu/first/tabs/tab1']);
  }

  goStatus(){
    this.router.navigate(['menu/first/tabs/tab2']);
  }

  logout(){
    this.storage.clear();
    this.router.navigate(['/login/']);
  }

}
