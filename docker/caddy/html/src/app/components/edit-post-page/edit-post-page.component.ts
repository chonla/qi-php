import { Component, OnInit, OnDestroy } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { PostService } from 'src/app/services/post.service';
import { Router, ActivatedRoute, ParamMap, NavigationEnd } from '@angular/router';
import { switchMap } from 'rxjs/operators';
import { of, Subscription } from 'rxjs';

@Component({
  selector: 'app-edit-post-page',
  templateUrl: './edit-post-page.component.html',
  styleUrls: ['./edit-post-page.component.scss']
})
export class EditPostPageComponent implements OnInit, OnDestroy {

  postForm: FormGroup;
  formLocked: boolean;
  status: string;
  navigation$: Subscription;

  constructor(private fb: FormBuilder, private ps: PostService, private router: Router, private activatedRoute: ActivatedRoute) {
    this.formLocked = false;

    this.navigation$ = this.router.events.subscribe((e: any) => {
      // If it is a NavigationEnd event re-initalise the component
      if (e instanceof NavigationEnd) {
        this.loadPost();
      }
    });
  }

  loadPost() {
    this.activatedRoute.paramMap.pipe(
      switchMap((params: ParamMap) =>
        of(params.get('id'))
      )
    ).subscribe(id => {
      this.ps.get(id).subscribe(post => {
        this.postForm = this.fb.group({
          id: post.id,
          title: post.title,
          body: post.body
        });
        this.status = post.status;
      })
    });
  }

  ngOnInit() {
    this.loadPost();
  }

  ngOnDestroy() {
    if (this.navigation$) {
      this.navigation$.unsubscribe();
    }
  }

  publishPost() {
    this.formLocked = true;
    this.postForm.disable();
    this.ps.publish(this.postForm.value).subscribe({
      next: result => {
        console.log('publish', result);
        this.router.navigate(['/admin','posts','edit',result.id]);
        this.formLocked = false;
        this.postForm.enable();
      },
      error: e => {
        this.formLocked = false;
        this.postForm.enable();
      }
    });
  }

  draftPost() {
    this.formLocked = true;
    this.postForm.disable();
    this.ps.saveDraft(this.postForm.value).subscribe({
      next: result => {
        console.log('draft', result);
        this.router.navigate(['/admin','posts','edit',result.id]);
        this.formLocked = false;
        this.postForm.enable();
      },
      error: e => {
        this.formLocked = false;
        this.postForm.enable();
      }
    });
  }

  formPreview() {
    console.log("previewed");
  }

}
