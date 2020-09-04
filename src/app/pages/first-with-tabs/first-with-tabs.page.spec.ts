import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { FirstWithTabsPage } from './first-with-tabs.page';

describe('FirstWithTabsPage', () => {
  let component: FirstWithTabsPage;
  let fixture: ComponentFixture<FirstWithTabsPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FirstWithTabsPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(FirstWithTabsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
