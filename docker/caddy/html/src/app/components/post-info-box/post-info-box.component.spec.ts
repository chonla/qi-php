import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostInfoBoxComponent } from './post-info-box.component';

describe('PostInfoBoxComponent', () => {
  let component: PostInfoBoxComponent;
  let fixture: ComponentFixture<PostInfoBoxComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostInfoBoxComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostInfoBoxComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
