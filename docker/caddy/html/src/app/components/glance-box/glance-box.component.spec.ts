import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GlanceBoxComponent } from './glance-box.component';

describe('GlanceBoxComponent', () => {
  let component: GlanceBoxComponent;
  let fixture: ComponentFixture<GlanceBoxComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GlanceBoxComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GlanceBoxComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
