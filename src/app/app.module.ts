import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ViewPubliComponent } from './components/view-publi/view-publi.component';
import { ViewLoginUserComponent } from './components/view-login-user/view-login-user.component';
import { ViewLoginAdminComponent } from './components/view-login-admin/view-login-admin.component';

@NgModule({
  declarations: [
    AppComponent,
    ViewPubliComponent,
    ViewLoginUserComponent,
    ViewLoginAdminComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
