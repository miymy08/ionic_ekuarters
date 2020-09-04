import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ButiranPekerjaanPage } from './butiran-pekerjaan.page';

const routes: Routes = [
  {
    path: '',
    component: ButiranPekerjaanPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ButiranPekerjaanPageRoutingModule {}
