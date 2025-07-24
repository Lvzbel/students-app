import { Alert, AlertDescription, AlertTitle } from "@/components/ui/alert"
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { Terminal } from "lucide-react";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create New Student',
        href: '/students/create',
    },
];

export default function Create() {
    const { data, setData, post, processing, errors } = useForm({
        name: ''
    })

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault()
        post(route('students.store'))
    }

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Create Student" />
            <div className="w-4/12 p-4">
                <form onSubmit={handleSubmit} className='space-y-4'>
                    {
                        Object.keys(errors).length > 0 && (
                            <Alert variant="destructive">
                                <Terminal />
                                <AlertTitle>Errors!</AlertTitle>
                                <AlertDescription>
                                    <ul>
                                        {Object.entries(errors).map((([key, message]) => (
                                            <li key={key}>{message}</li>
                                        )))}
                                    </ul>
                                </AlertDescription>
                            </Alert>
                        )
                    }
                    <div className="flex flex-col space-y-2">
                        <Label htmlFor="student name">Name</Label>
                        <Input placeholder="Student Name" value={data.name} onChange={(e) => setData('name', e.target.value)}></Input>
                    </div>
                    <div className='flex gap-4'>
                        <Link href={route('students.index')}><Button variant='destructive'>Cancel</Button></Link>
                        <Button type='submit'>Add Student</Button>
                    </div>  
                </form>
            </div>
        </AppLayout>
    );
}
