import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { SejarahPermohonanPage } from './sejarah-permohonan.page';

describe('SejarahPermohonanPage', () => {
  let component: SejarahPermohonanPage;
  let fixture: ComponentFixture<SejarahPermohonanPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SejarahPermohonanPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(SejarahPermohonanPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
