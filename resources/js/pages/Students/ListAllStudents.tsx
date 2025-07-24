import { Link, usePage } from '@inertiajs/react';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table"

interface Student {
    id: number;
    name: string,
    grade: number,
}

interface PageProps{
    student: Student
}

export default function ListAllStudents() {

    const { students } = usePage().props as PageProps;

    return (
        <div className="overflow-hidden rounded-md border">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">ID</TableHead>
                        <TableHead>Name</TableHead>
                        <TableHead>Grade</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>

                
            { students.length === 0 ? (
                <TableRow>
                    <TableCell>
                        No students available
                    </TableCell>
                </TableRow>
            ) :
                students.map((student: Student) => (
                    <TableRow>
                        <TableCell>{student.id} </TableCell>
                        <TableCell>{student.name}</TableCell>
                        <TableCell>{student.grade}</TableCell>
                    </TableRow>
                ))
            }
                </TableBody>
            </Table>
        </div>
    );
}
