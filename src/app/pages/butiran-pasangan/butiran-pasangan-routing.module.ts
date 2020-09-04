import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ButiranPasanganPage } from './butiran-pasangan.page';

const routes: Routes = [
  {
    path: '',
    component: ButiranPasanganPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ButiranPasanganPageRoutingModule {}
