import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { MaklumatTanggunganPage } from './maklumat-tanggungan.page';

const routes: Routes = [
  {
    path: '',
    component: MaklumatTanggunganPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class MaklumatTanggunganPageRoutingModule {}
