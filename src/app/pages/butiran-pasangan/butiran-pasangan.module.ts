import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ButiranPasanganPageRoutingModule } from './butiran-pasangan-routing.module';

import { ButiranPasanganPage } from './butiran-pasangan.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ButiranPasanganPageRoutingModule
  ],
  declarations: [ButiranPasanganPage]
})
export class ButiranPasanganPageModule {}
