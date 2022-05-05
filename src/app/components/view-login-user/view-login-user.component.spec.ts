import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewLoginUserComponent } from './view-login-user.component';

describe('ViewLoginUserComponent', () => {
  let component: ViewLoginUserComponent;
  let fixture: ComponentFixture<ViewLoginUserComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ViewLoginUserComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewLoginUserComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
