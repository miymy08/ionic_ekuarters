import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SejarahPermohonanPage } from './sejarah-permohonan.page';

const routes: Routes = [
  {
    path: '',
    component: SejarahPermohonanPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SejarahPermohonanPageRoutingModule {}
