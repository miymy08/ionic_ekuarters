import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { MenuPage } from './menu.page';


const routes: Routes = [
  {
    path: '',
    component: MenuPage,
    children: [
      {
        path: 'first',
        loadChildren:  () => import('../first-with-tabs/first-with-tabs.module').then( m => m.FirstWithTabsPageModule)
      },
      {
        path: 'second',
        loadChildren:  () => import('../second/second.module').then( m => m.SecondPageModule)
      },
      {
        path: 'second/details',
        loadChildren:  () => import('../details/details.module').then( m => m.DetailsPageModule)
      },
      {
        path: 'butiranmaklumat',
        loadChildren:  () => import('../butiran-maklumat/butiran-maklumat.module').then( m => m.ButiranMaklumatPageModule)
      },
      {
      path: 'butiranpekerjaan',
      loadChildren:  () => import('../butiran-pekerjaan/butiran-pekerjaan.module').then( m => m.ButiranPekerjaanPageModule)
      },
      {
        path: 'butiranpasangan',
        loadChildren:  () => import('../butiran-pasangan/butiran-pasangan.module').then( m => m.ButiranPasanganPageModule)
      },
      {
        path: 'maklumattanggungan',
        loadChildren:  () => import('../maklumat-tanggungan/maklumat-tanggungan.module').then( m => m.MaklumatTanggunganPageModule)
      },
      {
        path: 'sejarahpermohonan',
        loadChildren:  () => import('../sejarah-permohonan/sejarah-permohonan.module').then( m => m.SejarahPermohonanPageModule)
      }

    ]

  }
]

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [MenuPage]
})
export class MenuPageModule {}
