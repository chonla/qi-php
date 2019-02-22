import { Pipe, PipeTransform } from '@angular/core';
import { environment } from '../../environments/environment';

@Pipe({
  name: 'slugUrl'
})
export class SlugUrlPipe implements PipeTransform {

  transform(slug: string): string {
    if (typeof(slug) === 'undefined') {
      return '';
    }
    return `${environment.baseUrl}/posts/${slug}`;
  }

}
