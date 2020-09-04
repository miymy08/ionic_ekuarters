import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ButiranPekerjaanPage } from './butiran-pekerjaan.page';

describe('ButiranPekerjaanPage', () => {
  let component: ButiranPekerjaanPage;
  let fixture: ComponentFixture<ButiranPekerjaanPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ButiranPekerjaanPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ButiranPekerjaanPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
