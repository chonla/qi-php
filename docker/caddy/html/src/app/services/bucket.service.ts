import { Injectable } from '@angular/core';
import { LocalStorageService } from 'ngx-localstorage';

@Injectable({
  providedIn: 'root'
})
export class BucketService {

  constructor(private ls: LocalStorageService) {}

  set(key: string, value: string, expiresAt: number) {
    this.ls.set(`${key}.data`, value, 'qi');
    this.ls.set(`${key}.expiresAt`, `${expiresAt}`, 'qi');
  }

  get(key: string): string|null {
    if (this.has(key)) {
      const data = this.ls.get(`${key}.data`, 'qi');
      return data;
    }
    return null;
  }

  delete(key: string) {
    this.ls.remove(`${key}.data`, 'qi');
    this.ls.remove(`${key}.expiresAt`, 'qi');
  }

  has(key: string): boolean {
    const expiresAt = this.ls.get(`${key}.expiresAt`, 'qi');
    if (expiresAt !== null) {
      const now = Math.floor((new Date()).getTime() / 1000);
      if (now < parseInt(expiresAt, 10)) {
        const data = this.ls.get(`${key}.data`, 'qi');
        if (data !== null) {
          return true;
        }
      }
    }
    return false;
  }
}
