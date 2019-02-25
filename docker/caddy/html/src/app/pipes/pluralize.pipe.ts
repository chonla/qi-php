import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'pluralize'
})
export class PluralizePipe implements PipeTransform {

  // irregular nouns
  ir = {
    'woman': 'women',
    'man': 'men',
    'child': 'children',
    'tooth': 'teeth',
    'foot': 'feet',
    'person': 'people',
    'leaf': 'leaves',
    'mouse': 'mice',
    'goose': 'geese',
    'half': 'halves',
    'knife': 'knives',
    'wife': 'wives',
    'life': 'lives',
    'elf': 'elves',
    'loaf': 'loaves',
    'potato': 'potatoes',
    'tomato': 'tomatoes',
    'cactus': 'cacti',
    'focus': 'foci',
    'fungus': 'fungi',
    'nucleus': 'nuclei',
    'syllabus': 'syllabuses',
    'analysis': 'analyses',
    'diagnosis': 'diagnoses',
    'oasis': 'oases',
    'thesis': 'theses',
    'crisis': 'crises',
    'phenomenon': 'phenomena',
    'criterion': 'criteria',
    'datum': 'data'
  };

  ident = [
    'sheep',
    'fish',
    'deer',
    'species',
    'aircraft'
  ];

  transform(word: string, count: number): string {
    if (word.trim().length < 2) {
      return word;
    }
    if (count === 1) {
      return word;
    }

    if (this.ir[word]) {
      return this.ir[word];
    }

    if (this.ident.indexOf(word) >= 0) {
      return word;
    }

    if ((['s','z','x'].indexOf(word.charAt(word.length - 1)) >= 0) || (['ch','sh'].indexOf(word.substr(word.length - 2, word.length - 1)) >= 0)){
      return `${word}es`;
    }
    if (word.charAt(word.length - 1) === 'y' && ['a','e','i','o','u'].indexOf(word.charAt(word.length - 2))) {
      const w = word.substr(0, word.length - 1);
      return `${w}ies`;
    }

    return `${word}s`;
  }

}
