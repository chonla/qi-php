import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QiLogoComponent } from './qi-logo.component';

describe('QiLogoComponent', () => {
  let component: QiLogoComponent;
  let fixture: ComponentFixture<QiLogoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QiLogoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QiLogoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
