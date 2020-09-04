import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SejarahPermohonanPageRoutingModule } from './sejarah-permohonan-routing.module';

import { SejarahPermohonanPage } from './sejarah-permohonan.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SejarahPermohonanPageRoutingModule
  ],
  declarations: [SejarahPermohonanPage]
})
export class SejarahPermohonanPageModule {}
