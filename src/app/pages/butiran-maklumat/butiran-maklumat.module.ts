import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ButiranMaklumatPageRoutingModule } from './butiran-maklumat-routing.module';

import { ButiranMaklumatPage } from './butiran-maklumat.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ButiranMaklumatPageRoutingModule
  ],
  declarations: [ButiranMaklumatPage]
})
export class ButiranMaklumatPageModule {}
