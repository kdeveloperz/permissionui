import { usePage } from '@inertiajs/vue3';

export function usePermission() {
    const hasRole = (name) => usePage().props.auth.user.roles.includes(name);
    const hasRoles = (names) => usePage().props.auth.user.roles.some((role) => names.includes(role));
    const hasPermission = (name) => usePage().props.auth.user.permissions.includes(name);
    const hasPermissions = (names) => usePage().props.value.auth.user.permissions.some((permission)=> names.includes(permission));

    return { hasRole, hasPermission, hasRoles, hasPermissions };
}