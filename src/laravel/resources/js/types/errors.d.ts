import { ErrorObject as VuelidateErrorObject } from '@vuelidate/core';

export type ErrorMessage = {
  [key: string]: string | string[];
};

// interfaceからtypeに変換
export type ErrorObject = VuelidateErrorObject;
export type MixedErrorMessage = string | ErrorMessage | ErrorObject[];
