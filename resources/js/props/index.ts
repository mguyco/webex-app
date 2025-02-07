import { User, Person } from '@/types';
import type { PropType } from 'vue';

export const user = {
    type: Object as PropType<User>
};

export const person = {
    type: Object as PropType<Person>
};

export const scopes = {
    type: Array as PropType<string[]>
};