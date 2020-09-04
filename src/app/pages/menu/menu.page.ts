import { Component, OnInit } from '@angular/core';
import { Router, RouterEvent } from '@angular/router';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.page.html',
  styleUrls: ['./menu.page.scss'],
})
export class MenuPage implements OnInit {

  pages = [
/*     {
      title: 'First With Tabs',
      url: '/menu/first'
    },
    {
      title: 'Second',
      url: '/menu/second'
    }, */
    {
      title: 'Butiran Maklumat',
      url: '/menu/butiranmaklumat',
      icon: 'person-add'
    },
    {
      title: 'Butiran Pekerjaan',
      url: '/menu/butiranpekerjaan',
      icon: 'briefcase'
    },
    {
      title: 'Butiran Pasangan',
      url: '/menu/butiranpasangan',
      icon: 'heart'
    },
    {
      title: 'Maklumat Tanggungan',
      url: '/menu/maklumattanggungan',
      icon: 'people'
    },
    {
      title: 'Sejarah Permohonan',
      url: '/menu/sejarahpermohonan',
      icon: 'checkmark-circle'
    }

  ];

  selectedPath = '';

  constructor(private router: Router) {
    this.router.events.subscribe((event: RouterEvent) => {
      if (event && event.url) {
        this.selectedPath = event.url;

      }
    })
   }

  ngOnInit() {
  }

}
