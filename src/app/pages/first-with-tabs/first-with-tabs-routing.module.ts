import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FirstWithTabsPage } from './first-with-tabs.page';

const routes: Routes = [
  {
    path: '',
    component: FirstWithTabsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FirstWithTabsPageRoutingModule {}
