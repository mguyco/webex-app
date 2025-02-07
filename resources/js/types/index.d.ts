export interface User {
    id: number;
    personId: string;
    orgId: string;
    name: string;
    email: string;
    avatar?: string;
}

export interface Person {
    id: string;
    emails: string[];
    phoneNumbers: PhoneNumber[];
    extension: string;
    locationId: string;
    displayName: string;
    nickName: string;
    firstName: string;
    lastName: string;
    avatar: string;
    orgId: string;
    roles: string[];
    licenses: string[];
    department: string;
    created: string;
    lastModified: string;
    timezone: string;
    lastActivity: string;
    status: string;
    invitePending: boolean;
    loginEnabled: boolean;
    type: string;
};

export enum PersonType {
    'person',
    'bot',
    'appuser'
};

export enum PersonStatusType {
    'active',
    'call',
    'DoNotDisturb',
    'inactive',
    'meeting',
    'OutOfOffice',
    'pending',
    'presenting',
    'unknown'
};

export interface PhoneNumber {
    type: PhoneNumberType;
    value: string;
    primary: boolean;
};

export enum PhoneNumberType {
    'work',
    'work_extension',
    'mobile',
    'fax'
}

export interface SipAddress {
    type: SipAddressType;
    value: string;
    primary: boolean;
};

export enum SipAddressType {
    'personal-room',
    'enterprise',
    'cloud-calling'
};

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
