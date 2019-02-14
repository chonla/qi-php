import { Component, OnInit, Output, EventEmitter, Input } from '@angular/core';
import { faGlobe, faEye, faStickyNote } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-editor-toolbar',
  templateUrl: './editor-toolbar.component.html',
  styleUrls: ['./editor-toolbar.component.scss']
})
export class EditorToolbarComponent implements OnInit {

  faGlobe = faGlobe;
  faEye = faEye;
  faStickyNote = faStickyNote;

  @Input('disabled') locked: boolean;
  @Output() submit: EventEmitter<void> = new EventEmitter<void>();
  @Output() draft: EventEmitter<void> = new EventEmitter<void>();
  @Output() preview: EventEmitter<void> = new EventEmitter<void>();

  constructor() {
    this.locked = false;
  }

  ngOnInit() {
  }

  onSubmit() {
    this.submit.emit();
  }

  onSaveDraft() {
    this.draft.emit();
  }

  onPreview() {
    this.preview.emit();
  }

}
