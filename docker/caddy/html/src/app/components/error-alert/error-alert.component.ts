import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-error-alert',
  templateUrl: './error-alert.component.html',
  styleUrls: ['./error-alert.component.scss']
})
export class ErrorAlertComponent implements OnInit {

  public title;
  public message;
  public showed = false;

  constructor() { }

  show(title, message) {
    this.title = title;
    this.message = message;
    this.showed = true;
  }

  hide() {
    this.showed = false;
  }

  closeModal() {
    this.hide();
    return false;
  }

  ngOnInit() {
  }

}
