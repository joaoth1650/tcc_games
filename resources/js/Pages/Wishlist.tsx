import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';

export default function Wishlist({ auth, favoritos }: PageProps<{ favoritos : Array<any>}>) {
    console.log(favoritos)
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Wishlist</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-4xl text-gray-900">wishlist</div>
                        <div className="p-6 text-gray-900">{favoritos}</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
