import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ButiranMaklumatPage } from './butiran-maklumat.page';

describe('ButiranMaklumatPage', () => {
  let component: ButiranMaklumatPage;
  let fixture: ComponentFixture<ButiranMaklumatPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ButiranMaklumatPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ButiranMaklumatPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
