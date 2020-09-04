import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MaklumatTanggunganPage } from './maklumat-tanggungan.page';

describe('MaklumatTanggunganPage', () => {
  let component: MaklumatTanggunganPage;
  let fixture: ComponentFixture<MaklumatTanggunganPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MaklumatTanggunganPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MaklumatTanggunganPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
