import {
  doctorKinds,
  genders,
  academicSocieties,
  societyMemberTypes,
  specialtyQualifications,
  expEdu,
  wLicense,
  adminPenalty,
  falseRequest,
  USER_APPLICATION_TYPE,
  userBelonginCategory,
  sinceGraduation,
  cancerPatientRatio,
} from '@/util/const';
import { userStatus } from '@/util/userStatusConst';
import { Prefecture } from '@/types/region';

export type Gender = keyof typeof genders;
export type DoctorKind = keyof typeof doctorKinds;
export type AcademicSociety = keyof typeof academicSocieties;
export type SpecialtyQualification = keyof typeof specialtyQualifications;
export type SocietyMemberType = keyof typeof societyMemberTypes;
export type ExpEdu = keyof typeof expEdu;
export type UserStatus = keyof typeof userStatus;
export type WLicense = keyof typeof wLicense;
export type AdminPenalty = keyof typeof adminPenalty;
export type FalseRequest = keyof typeof falseRequest;
export type UserApplicationType = (typeof USER_APPLICATION_TYPE)[keyof typeof USER_APPLICATION_TYPE];
export type UserBelonginCategory = keyof typeof userBelonginCategory;
export type SinceGraduation = keyof typeof sinceGraduation;
export type CancerPatientRatio = keyof typeof cancerPatientRatio;

export type UserInfo = {
  name: string;
  nameKana: string;
  birthday: Ymd;
  gender: Gender | undefined;
  doctorKind: DoctorKind | undefined;
  doctorNum: string;
  drRegDate: Ymd;
  facilityId: number | undefined;
  workName: string;
  workSection: string;
  workPhone: string;
  workAddress: AddressInfo;
  sendFlag: boolean;
  sendAddress: AddressInfo;
  mail: string;
  password: string;
  rePassword: string;
};

export type UserDetailInfo = {
  id: number;
  name: string;
  nameKana: string;
  birthday: string;
  age: number;
  gender: Gender;
  mail: string;
  doctorKind: DoctorKind;
  doctorNumber: string;
  doctorRegistrationDate: string;
  status: UserStatus;
  certificationNumber: string | null;
  latestReceiptNumber: string | null;
  passedExamineNumber: string | null;
  attendanceNumber: string | null;
  workName: string | null;
  workSection: string;
  workZipcode: string | null;
  workPrefecture: Prefecture | null;
  workAddress1: string | null;
  workAddress2: string | null;
  workBuilding: string | null;
  workPhone: string;
  sendFlag: boolean;
  zipcode: string | null;
  prefecture: Prefecture | null;
  address1: string | null;
  address2: string | null;
  building: string | null;
  note: string | null;
  expEdu: ExpEdu;
  createdAt: string;
  updatedAt: string;
  certificationDate: string | null;
  updateCount: number | null;
  lastUpdatedAt: string | null;
  expiredDate: string | null;
  wLicense: boolean;
  adminPenalty: boolean;
  falseRequest: boolean;
  pmtList: boolean;
  facility: { certificationNumber: string | null };
  userGrace: { expiredDate: string | null };
};

export type Ymd = {
  year: number | undefined;
  month: number | undefined;
  day: number | undefined;
};