import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ButiranPekerjaanPageRoutingModule } from './butiran-pekerjaan-routing.module';

import { ButiranPekerjaanPage } from './butiran-pekerjaan.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ButiranPekerjaanPageRoutingModule
  ],
  declarations: [ButiranPekerjaanPage]
})
export class ButiranPekerjaanPageModule {}
