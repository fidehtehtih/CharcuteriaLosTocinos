import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewPubliComponent } from './view-publi.component';

describe('ViewPubliComponent', () => {
  let component: ViewPubliComponent;
  let fixture: ComponentFixture<ViewPubliComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ViewPubliComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewPubliComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
