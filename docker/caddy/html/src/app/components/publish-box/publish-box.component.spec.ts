import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PublishBoxComponent } from './publish-box.component';

describe('PublishBoxComponent', () => {
  let component: PublishBoxComponent;
  let fixture: ComponentFixture<PublishBoxComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PublishBoxComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PublishBoxComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
