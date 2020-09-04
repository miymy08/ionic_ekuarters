import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ButiranMaklumatPage } from './butiran-maklumat.page';

const routes: Routes = [
  {
    path: '',
    component: ButiranMaklumatPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ButiranMaklumatPageRoutingModule {}
