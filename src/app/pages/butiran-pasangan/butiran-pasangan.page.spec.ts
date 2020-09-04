import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ButiranPasanganPage } from './butiran-pasangan.page';

describe('ButiranPasanganPage', () => {
  let component: ButiranPasanganPage;
  let fixture: ComponentFixture<ButiranPasanganPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ButiranPasanganPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ButiranPasanganPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
