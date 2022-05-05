import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewLoginAdminComponent } from './view-login-admin.component';

describe('ViewLoginAdminComponent', () => {
  let component: ViewLoginAdminComponent;
  let fixture: ComponentFixture<ViewLoginAdminComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ViewLoginAdminComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewLoginAdminComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
