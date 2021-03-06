import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { AlertModule } from 'ngx-bootstrap/alert';
import { PopoverModule } from 'ngx-bootstrap/popover';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { QuillModule } from 'ngx-quill';
import { ClipboardModule } from 'ngx-clipboard';

import { AppComponent } from './app.component';
import { LoginPageComponent } from './components/login-page/login-page.component';
import { LoginBoxComponent } from './components/login-box/login-box.component';
import { ErrorAlertComponent } from './components/error-alert/error-alert.component';
import { DashboardPageComponent } from './components/dashboard-page/dashboard-page.component';
import { NgxLocalStorageModule } from 'ngx-localstorage';
import { DefaultLayoutComponent } from './components/default-layout/default-layout.component';
import { AppChildRoutingModule } from './app-child-routing.module';
import { SideMenuComponent } from './components/side-menu/side-menu.component';
import { PostsPageComponent } from './components/posts-page/posts-page.component';
import { TagsPageComponent } from './components/tags-page/tags-page.component';
import { QiLogoComponent } from './components/qi-logo/qi-logo.component';
import { GlanceBoxComponent } from './components/glance-box/glance-box.component';
import { NewPostPageComponent } from './components/new-post-page/new-post-page.component';
import { environment } from 'src/environments/environment';
import { PostInfoBoxComponent } from './components/post-info-box/post-info-box.component';
import { AuthInterceptor } from './interceptors/auth.interceptor';
import { EditPostPageComponent } from './components/edit-post-page/edit-post-page.component';
import { EditorToolbarComponent } from './components/editor-toolbar/editor-toolbar.component';
import { SlugUrlPipe } from './pipes/slug-url.pipe';
import { PluralizePipe } from './pipes/pluralize.pipe';

@NgModule({
  declarations: [
    AppComponent,
    LoginPageComponent,
    LoginBoxComponent,
    ErrorAlertComponent,
    DashboardPageComponent,
    DefaultLayoutComponent,
    SideMenuComponent,
    PostsPageComponent,
    TagsPageComponent,
    QiLogoComponent,
    GlanceBoxComponent,
    NewPostPageComponent,
    PostInfoBoxComponent,
    EditPostPageComponent,
    EditorToolbarComponent,
    SlugUrlPipe,
    PluralizePipe
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    AppChildRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    NgxLocalStorageModule.forRoot(),
    FontAwesomeModule,
    AlertModule.forRoot(),
    PopoverModule.forRoot(),
    QuillModule.forRoot(environment.editor),
    ClipboardModule
  ],
  providers: [{
    provide: HTTP_INTERCEPTORS,
    useClass: AuthInterceptor,
    multi: true
  }],
  bootstrap: [AppComponent]
})
export class AppModule { }
