import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MaklumatTanggunganPageRoutingModule } from './maklumat-tanggungan-routing.module';

import { MaklumatTanggunganPage } from './maklumat-tanggungan.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    MaklumatTanggunganPageRoutingModule
  ],
  declarations: [MaklumatTanggunganPage]
})
export class MaklumatTanggunganPageModule {}
